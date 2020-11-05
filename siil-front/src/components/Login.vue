<template >
<div >
  <v-app  
   
  >
    
    <!--<v-app-bar app dark color="blue">
      <v-toolbar-title>ITCHA-AGAPE</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn text rounded>Inicio</v-btn>
    </v-app-bar>-->

    <v-main id="body1">
      <v-card width="440" class="mx-auto  mt-16  pl-5 pr-5 ">
        <v-card-title class="justify-center pt-12 "  id="title">
          Inicia Sesión
        </v-card-title>
        <v-card-text>
          <v-form ref="formUsuarios">
          <v-text-field
           required :rules="[v => !!v || 'El codigo es requerido']"
            label="Username"
            v-model="login.email"
             prepend-icon="mdi-account-circle"/>
          <v-text-field 
          required
          label="Password" 
          :type="showPassword ? 'text' : 'password'"
          v-model="login.password"
          prepend-icon="mdi-lock"
          :rules="[v => !!v || 'La Contraseña es requerida']"
          :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="showPassword = !showPassword"/>
          </v-form>
        </v-card-text>

        
        <v-card-actions>
           <v-row align="center">
             <v-col
              cols="12"
              mx="6"
              
            >
            <div class="text-center">
              <div class="my-2">
                <v-btn block color="info" @click="loginUsuario()" >
                  <v-icon left>
                    mdi mdi-account-key
                  </v-icon>Login
                </v-btn>
              </div>
              <!--<div class="my-2">
              <v-btn color="success">Register</v-btn>
              </div>-->
            </div>
             </v-col>
           </v-row>
          
        </v-card-actions>
      </v-card>
      <h3 class=" black--text text-center mt-8">Portal Laboral</h3>
      <p class=" black--text text-center">Instituto Tecnológico de Chalatenango
        <strong> ITCHA-AGAPE •</strong>
        <a class=" orange--text" href="https://www.itcha.edu.sv/" target="_blank">www.itcha.edu.sv</a></p>
    </v-main>
    

    <template>
    
  <v-footer dark color="blue" >
      <span class="py-2 white--text text-center">&copy; {{new Date().getFullYear()}} - Derechos Reservados - ITCHA AGAPE</span>
    </v-footer>
  </template>
    
  </v-app>
  </div>
</template>
<script>

  export default {
    
    data () {
      
      
      return {
        showPassword: false,
        
         dialog: false,
         user: {
             name: "",
             email: "",
             password: "",
             estado: "A",
             idtipo_usuario: 2 
         },
         login:{
             email: "",
             password: "",
         },
      };
    },
    methods: {
      //Metodo registro de usuarios con token listo
        fetchUsuarios() {
            let me = this;
            me.$http
            .post(`${me.$url}/users`, me.user )
            .then(function(response){
              me.dialog = false;
              alert("REGistrado con exito");
                console.log(response.data);
            })
            .catch(function(error){
              console.log(error);
            });
          },
     //hoy esta pulido
        loginUsuario(){
        let me = this;
            me.$http
            .post(`${me.$url}/login`, me.login)
            .then(function(response){
              if(response.status == 200){
                let x = response.data.token;
                me.$store.state.token = localStorage.setItem('token',x);
                let user =response.data.user 
                let estado = user.estado;
                 switch (estado) {
                    case "A":
                      me.$router.push('/');
                     alert("Bienvenido al sistema  : !!"+ user.name +" !!");
                      break;
                    case "N":
                      me.$router.push('/accept');
                         alert("Llena el proceso para continuar");
                      break;
                    case "I":
                      me.$router.push('/login');
                      alert("Lo siento no Acceptastes el proceso");
                      break;
                  }
              }
            })
            .catch(function(error){
              console.log(error);
            });
          },

           logout(){
             let x = localStorage.getItem('token');
            let me = this,
            header = {
              headers: {
                "Authorization": "Bearer "+ x,
              },
            };
             me.$http.get(`${me.$url}/logout`,header)
            .then(function(response){ 
               if(response.status==200){ 
                  localStorage.clear();           
                  alert("Adios");
                console.log(response.data);
               }                        
            })
            .catch(function(error){              
              console.log(error);
            });
          },

    },
        
    mounted(){
    },
  };
</script>
<style >
#body1{
  
  background-image: url('/itcha/11.png');
  background-repeat: no-repeat;
  background-size: 100% 100%;
  
}
#title{
  
  font-family: "Segoe UI";
  font-size: 30px;
  text-align: center;
  
}
</style>