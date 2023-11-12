document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 650,
                events: '../calendrier/fetchEvents.php',
                locale: 'fr',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,list'
                },
                buttonText: {
                    today: 'Aujourd\'hui',
                    month: 'Mois',
                    week: 'Semaine',
                    list: 'Liste'
                },
                
                selectable: true,
                select: async function (start, end, allDay) {
                const { value: formValues } = await Swal.fire({
                    title: 'Ajouter un évènement',
                    confirmButtonText: 'Confirmer',
                    showCloseButton: true,
                        showCancelButton: true,
                    html:
                    '<input id="swalEvtTitle" class="swal2-input" placeholder="Entrer un titre">' +
                    '<textarea id="swalEvtDesc" class="swal2-input" placeholder="Entrer une description"></textarea>' +
                    '<input id="swalEvtURL" class="swal2-input" placeholder="Entrer une URL">',
                    focusConfirm: false,
                    preConfirm: () => {
                    return [
                        document.getElementById('swalEvtTitle').value,
                        document.getElementById('swalEvtDesc').value,
                        document.getElementById('swalEvtURL').value
                    ]
                    }
                });

                if (formValues) {
                    // Add event
                    fetch("../calendrier/eventHandler.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ request_type:'addEvent', start:start.startStr, end:start.endStr, event_data: formValues}),
                    })
                    .then(response => response.json())
                    .then(data => {
                    if (data.status == 1) {
                        Swal.fire('Event added successfully!', '', 'success');
                    } else {
                        Swal.fire(data.error, '', 'error');
                    }

                    // Refetch events from all sources and rerender
                    calendar.refetchEvents();
                    })
                    .catch(console.error);
                }
                },

                eventClick: function(info) {
                info.jsEvent.preventDefault();
                
                // change the border color
                info.el.style.borderColor = 'red';
                
                Swal.fire({
                    title: info.event.title,
                    icon: 'info',
                    html:'<p>'+info.event.extendedProps.description+'</p><a href="'+info.event.url+'">Visiter la page</a>',
                    showCloseButton: true,
                    showCancelButton: true,
                    showDenyButton: true,
                    cancelButtonText: 'Fermer',
                    confirmButtonText: 'Supprimer',
                    denyButtonText: 'Modifier',
                }).then((result) => {
                    if (result.isConfirmed) {
                    // Delete event
                    fetch("../calendrier/eventHandler.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ request_type:'deleteEvent', event_id: info.event.id}),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status == 1) {
                        Swal.fire('Event deleted successfully!', '', 'success');
                        } else {
                        Swal.fire(data.error, '', 'error');
                        }

                        // Refetch events from all sources and rerender
                        calendar.refetchEvents();
                    })
                    .catch(console.error);
                    } else if (result.isDenied) {
                    // Edit and update event
                    Swal.fire({
                        title: 'Modifier l\'évènement',
                        html:
                        '<input id="swalEvtTitle_edit" class="swal2-input" placeholder="Enter title" value="'+info.event.title+'">' +
                        '<textarea id="swalEvtDesc_edit" class="swal2-input" placeholder="Enter description">'+info.event.extendedProps.description+'</textarea>' +
                        '<input id="swalEvtURL_edit" class="swal2-input" placeholder="Enter URL" value="'+info.event.url+'">',
                        focusConfirm: false,
                        confirmButtonText: 'Confirmer',
                        preConfirm: () => {
                        return [
                        document.getElementById('swalEvtTitle_edit').value,
                        document.getElementById('swalEvtDesc_edit').value,
                        document.getElementById('swalEvtURL_edit').value
                        ]
                        }
                    }).then((result) => {
                        if (result.value) {
                        // Edit event
                        fetch("../calendrier/eventHandler.php", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ request_type:'editEvent', start:info.event.startStr, end:info.event.endStr, event_id: info.event.id, event_data: result.value})
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status == 1) {
                            Swal.fire('Evènement modifié avec succès!', '', 'success');
                            } else {
                            Swal.fire(data.error, '', 'error');
                            }

                            // Refetch events from all sources and rerender
                            calendar.refetchEvents();
                        })
                        .catch(console.error);
                        }
                    });
                    } else {
                    Swal.close();
                    }
                });
                }
            });

            calendar.render();
        });