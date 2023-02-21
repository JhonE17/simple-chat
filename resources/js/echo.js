// echo.js

import emitter from './event';

Echo.join('chat')
    .here(users => {
        emitter.emit('users.here', users);
    })
    .joining(user => {
        emitter.emit('users.joined', user);
    })
    .leaving(user => {
        emitter.emit('users.left', user);
    })
    .listen('MessageCreated', (data) => {
        emitter.emit('added_message', data.message);
    });