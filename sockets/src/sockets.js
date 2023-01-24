
module.exports = io => {

  io.use((socket, next) => {
      next();
  });

  io.on('connection', async (socket) => {
    console.log("nueva conexion");

    //Disconnect
    socket.on("disconnect", function (data) {
    });

    socket.on("ir_pregunta",function(data){
      socket.broadcast.emit("ir_pregunta", data);
    });
    socket.on("atras",function(data){
      socket.broadcast.emit("atras", data);
    });
    socket.on("add_puntos",function(data){
      socket.broadcast.emit("atras", data);
      
    });
    socket.on("add_puntos",function(data){
      socket.broadcast.emit("add_puntos", data);
      
    });
    socket.on("enlazar_respuestas",function(data){
      socket.broadcast.emit("enlazar_respuestas", data);
      
    });
    socket.on("reinicio_game",function(data){
      
      socket.broadcast.emit("reinicio_game", data);
    });
    socket.on("error_game",function(data){
      socket.broadcast.emit("error_game", data);
      
    });
    socket.on("error_game2",function(data){
      socket.broadcast.emit("error_game2", data);
      
    });
    socket.on("ganar",function(data){
      socket.broadcast.emit("ganar", data);
      
    });
    socket.on("destapar",function(data){
      
      socket.broadcast.emit("destapar", data);
    });
    
    //preguntas rapidas
    socket.on("error_game_respuestas_rapidas",function(data){
  socket.broadcast.emit("error_game_respuestas_rapidas", data);
  
});
socket.on("ganar_respuestas_rapidas",function(data){
  socket.broadcast.emit("ganar_respuestas_rapidas", data);
  
});
socket.on("modo_preguntas_rapidas",function(data){
  
  socket.broadcast.emit("modo_preguntas_rapidas", data);
});
socket.on("inicio_tiempo",function(data){
  socket.broadcast.emit("inicio_tiempo", data);
  
});
socket.on("destapar_respuesta_rapida",function(data){
  socket.broadcast.emit("destapar_respuesta_rapida", data);
  
});

socket.on("destapar_puntaje_rapida",function(data){
  socket.broadcast.emit("destapar_puntaje_rapida", data);
  
});

socket.on("ocultar_rapida",function(data){
  socket.broadcast.emit("ocultar_rapida", data);
  
});
socket.on("tiempo_agotado",function(data){
  socket.broadcast.emit("tiempo_agotado", data);
  
});




  })
}












//respaldos

/*

setTimeout(function () {
      var roomLength = io.sockets.adapter.rooms[prefix+'2'];
      if (roomLength != undefined) console.log(roomLength.length);
    }, 3000);


var idUser = 2;
let sockets = connections.filter(element => element.idUser = idUser);
sockets.forEach(element => {
  console.log(element.id);
});


users = [];
connections = [];

users.splice(users.indexOf(socket.username), 1);
connections.splice(connections.indexOf(socket), 1);
io.emit("online", connections.length);


console.log(connections.length);
io.emit("online", connections.length);

socket.on('newMessage',(data) => {
      socket.broadcast.emit("message", data);
    })
 */