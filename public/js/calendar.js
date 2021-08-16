document.addEventListener('DOMContentLoaded', function () {

    let formulario = document.querySelector("form");
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        locale: "es",

        navLinks: true,
        selectable: true,

        // navLinkDayClick: function (date, jsEvent) {
        //     calendar.changeView('timeGridDay', date);
        // },

        // dateClick: function (info) {
        //     formulario.reset();
        //     console.log(info.date);
        //     console.log(moment(info.dateStr));
        //     formulario.start.value = info.date;
        //     formulario.end.value = info.date;
        //     console.log(formulario.start.value)
        //     console.log(formulario.end.value)
        //     $("#evento").modal("show");
        // },

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        slotLabelInterval: '00:30',
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            meridiem: false
        },
        slotLabelFormat:
        {
            hour: 'numeric',
            minute: '2-digit',
            meridiem: 'short'
        },

        slotMinTime: '10:00',
        slotMaxTime: '18:00',
        businessHours: [
            {
                daysOfWeek: [1, 2, 3, 4, 5, 6],
                startTime: '10:00',
                endTime: '18:00',
            },
        ],



        events: "/calendario/mostrar",
        eventColor: '#378006',

        dateClick: function (info) {
            let minutesToAdd = 30;
            var currentDate = new Date();
            var futureDate = new Date(currentDate.getTime() + minutesToAdd * 60000);
            // console.log(info["view"]["type"]);
            if (info["view"]["type"] === "dayGridMonth") {
                calendar.changeView('timeGridDay', info.dateStr);
            } else {
                formulario.reset();
                let lol = info.dateStr.slice(0, 19).replace('T', ' ');
                let lol2 = new Date(info.dateStr);

                // console.log(info.dateStr);
                // console.log(info.dateStr.add(moment.duration("01:00:00")));
                lol2.setMinutes(lol2.getMinutes() + 30);
                console.log(lol2);
                let lol3 = new Date(lol2.getTime() - (lol2.getTimezoneOffset() * 60000)).toISOString();
                // lol2 = lol2.toISOString().slice(0, 19).replace('T', " ");
                console.log(lol3.slice(0, 19).replace('T', ' '));
                formulario.start.value = lol;
                formulario.end.value = lol3.slice(0, 19).replace('T', ' ');
                $("#evento").modal("show");
            }
        },
        eventClick: function (info) {
            if (info["view"]["type"] === "dayGridMonth") {
                calendar.changeView('timeGridDay', info.dateStr);
            } else {
                var evento = info.event;
                console.log(evento);
                axios.post("/calendario/editar/" + info.event.id).
                    then(
                        (respuesta) => {
                            formulario.id.value = respuesta.data.id;
                            formulario.title.value = respuesta.data.title;
                            formulario.medico.value = respuesta.data.medico;
                            formulario.owner.value = respuesta.data.owner;
                            formulario.email.value = respuesta.data.email;
                            formulario.fono.value = respuesta.data.fono;
                            formulario.descripcion.value = respuesta.data.descripcion;
                            formulario.start.value = respuesta.data.start;
                            formulario.end.value = respuesta.data.end;
                            $("#evento").modal("show");
                        }
                    ).catch(
                        error => {
                            if (error.response) {
                                console.log(error.response.data);
                            }
                        }
                    )
            }

        }

    });
    calendar.render();

    document.getElementById("btnGuardar").addEventListener("click", function () {
        enviarDatos("/calendario/agendar");
    });

    document.getElementById("btnEliminar").addEventListener("click", function () {
        enviarDatos("/calendario/borrar/" + formulario.id.value);
    });

    document.getElementById("btnModificar").addEventListener("click", function () {
        enviarDatos("/calendario/actualizar/" + formulario.id.value);
    });

    function enviarDatos(url) {
        const datos = new FormData(formulario);

        const nuevaURL = baseURL + url;
        axios.post(nuevaURL, datos).
            then(
                (respuesta) => {
                    calendar.refetchEvents();
                    $("#evento").modal("hide");
                }
            ).catch(
                error => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                }
            )
    };
});