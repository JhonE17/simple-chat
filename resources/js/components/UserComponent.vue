// UserComponent.vue

<template>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Users</div>
            <div class="card-body">
                <div class="users" v-for="user in users" :key="user.id">
                    <a href="#">{{ user.name }}</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import emitter from '../event';

    export default {

        data() {
            return {
                users: []
            }
        },

        mounted() {
            emitter.on('users.here', (users) => {
                this.users = users;
            })
            emitter.on('users.joined', (user) => {
                this.users.unshift(user);
            })
            emitter.on('users.left', (user) => {
                this.users = this.users.filter(u => {
                    return u.id != user.id
                });
            });
        }
    }
</script>

<style>
    .users {
        background-color: #fff;
        border-radius: 3px;
    }
    .users a{
        font-size: medium;
        text-decoration: none;
        font-weight: bold;
    }
</style>