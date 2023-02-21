// ChatFormComponent.vue

<template>
        <form class="form">
            <textarea
                id="content"
                cols="28"
                rows="2"
                class="form-input"
                @keydown="typing"
                v-model="content"
            >
            </textarea>
            <!-- <span class="notice"> Hit Return to send a message </span> -->
            <button class="btn btn-success" @click="sendMessage()">Enviar</button>
        </form>
</template>

<script>
import emitter from '../event.js';

export default {
    data() {
        return {
            content: null,
        };
    },
    methods: {
        typing(e) {
            if (e.keyCode === 13 && !e.shiftKey) {
                e.preventDefault();
                this.sendMessage();
            }
        },
        sendMessage() {
            if (!this.content || this.content.trim() === "") {
                alert('Empty entry is not allowed')
                return;
            }
            let messageObj = this.buildMessage();
            emitter.emit("added_message", messageObj);
            axios.post('/message', {
                content: this.content.trim()
            }).catch(() => {
                 alert('failed');
            });
            this.content = null;
        },
        buildMessage() {
            return {
                id: Date.now(),
                content: this.content,
                selfMessage: true,
                user: {
                    name:  Laravel.user.name,
                },
            };
        },
    },
};
</script>

<style>
.form {
    padding: 8px;
    display: flex;
    justify-content: space-between;
    place-items: center;
}
.form-input {
    width: 90%;
    border: 1px solid #d3e0e9;
    padding: 5px 10px;
    outline: none;
    border-radius: 5px;
}
.form button{
    height: 48px;
}
.notice {
    color: #aaa;
}
</style>
