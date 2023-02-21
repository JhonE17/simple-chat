// MessageComponent.vue

<template>
    <div class="message self">
        <strong class="user">{{message.user.name}}</strong>
        <p class="body">{{ message.content }}</p>
    </div>
</template>

<script>
    export default {
       props:['message']
    }
</script>

<style>
    .user {
        font-weight: 800;
    }
    .body {
        margin-bottom: 0;
        white-space: pre-wrap;
    }
    .message {
        border-bottom: 1px solid #dadada
    }
    .self {
        background-color: hsla(0, 23%, 97%, 0.719);
        padding: 10px;
    }
</style>