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
                <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Notifications</h5>
            </div>

            <div class="slimscroll" style="height: 230px;">
                <a v-for="notification in notifications" href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon bg-danger"><i class="mdi mdi-comment-account-outline"></i></div>
                    <p class="notify-details">
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
            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                View all <i class="fi-arrow-right"></i>
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

                axios.post('/notification/read', data).then(response => {
                    // window.location.href = '/post/' + notification.data.post.id;
                    console.log(response.data);
                });
            }
        }
    }
</script>
