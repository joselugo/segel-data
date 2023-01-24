const express = require('express');
const socketIO= require('socket.io');


//initializations
const app=express();
app.set('port',process.env.PORT||3000);
app.use(express.urlencoded({extended:false}));
const servidor=app.listen(app.get('port'),()=>{
  console.log(`Servidor corriendo en el puerto ${(app.get('port'))}`);
});

const io=socketIO.listen(servidor);

//Sockets
require ('./sockets')(io);

