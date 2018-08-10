<template>
    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
           aria-haspopup="false" aria-expanded="false">
            <i class="fi-bell noti-icon"></i>
            <span class="badge badge-danger badge-pill noti-icon-badge">{{ notifications.length }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg" style="width: 400px;">

            <!-- item-->
            <div class="dropdown-item noti-title">
                <h5 class="m-0"><span class="float-right"><small>C·A·S</small> </span>Últimas Alertas</h5>
            </div>

            <div class="slimscroll" style="height: 230px;">
                <a v-for="notification in notifications" v-on:click="markAsRead(notification)" class="dropdown-item notify-item">
                    <div class="notify-icon bg-danger"><i class="mdi mdi-comment-remove-outline"></i></div>
                    <p class="notify-details">
                        <i class="fi-head"></i>
                        <strong>
                            {{ notification.data.person.nombres }} {{ notification.data.person.apellidos }}
                        </strong>
                        <br> 
                        {{ notification.data.danger_notification.titular }}
                        <small class="text-muted">{{ notification.created_at }}</small>
                    </p>
                </a>
            </div>
            
            <!-- All-->
            <a href="/admin/danger-person-alerts" class="dropdown-item text-center text-primary notify-item notify-all">
                Ver Historial <i class="fi-arrow-right"></i>
            </a>

        </div>
    </li>
</template>

<script>
    export default {
        props: ['notifications'],
        methods: {
            markAsRead: function (notification) {
                var data = {
                    id: notification.id
                };
                
                // marcando como leida la notificacion seleccionada
                axios.post('/admin/notification/read', data).then(response => {
                    
                    // elimando visualmente la notificacion marcada como leida
                    for (var i = 0; i < this.notifications.length; i++)
                    {
                        if(this.notifications[i].id == notification.id)
                        {
                            this.notifications.splice(i, 1);
                        }
                    }
                });
            }
        }
    }
</script>
