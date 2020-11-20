<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      :src="'/img/login.jpg'"
      app
    >
  
      <v-list dense >
      <template>
          <v-list-item link :to="{path:'/login'}" style="color:white">
              <v-list-item-action>
                <v-icon>home</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Inicio</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
      </template>
      <!-- Menu desplegable-->
      <v-list-group>
        <template slot="activator">
          
              <v-list-item-action>
                <v-icon>line_weight</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Cat&aacute;logos</v-list-item-title>
              </v-list-item-content>
          
        </template>
        <!--Menu de categoria-->

        <v-list-item link :to="{path:'/areas'}">
              <v-list-item-action>
                <v-icon>category</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Areas</v-list-item-title>
              </v-list-item-content>
         </v-list-item>  
            <!--MENU DE MARCAS-->
            <v-list-item link :to="{path:'/usuarios'}"><!--ESTA FORMA FUNCIONA BIEN ASI SE DECLARAN LAS RUTAS-->
              <v-list-item-action>
                <v-icon>speaker_phone</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Usuarios</v-list-item-title>
              </v-list-item-content>
            </v-list-item>      
            <!--Menu de Producto--> 
            <v-list-item link :to="{path:'/formulario_perfil'}">
              <v-list-item-action>
                <v-icon>laptop</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Formulario Registro Perfil</v-list-item-title>
              </v-list-item-content>
            </v-list-item> 
      </v-list-group>
      <!--Opciones de pedido-->
            <template> <!--opcion de pedidos -->
                <v-list-item link :to="{name:'pedidos.listado.recibidos'}"> <!-- MENU DE productos-->
                  <v-list-item-action>
                    <v-icon>shopping_cart</v-icon>
                  </v-list-item-action>
                <v-list-item-content>
                  <v-list-item-title>Pedidos</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </template> 



        <!--menu para seguridad-->
        <v-list-group>
          <template slot="activator">
                <v-list-item-action>
                    <v-icon>settings</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                  <v-list-item-title>Gestion de Usuarios</v-list-item-title>
                </v-list-item-content>
          </template>
          <v-list-item link ><!--menu de roles-->
              <v-list-item-action>
                <v-icon>person</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Roles</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
            <v-list-item link> <!-- MENU DE MARCAS-->
              <v-list-item-action>
                <v-icon>group</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Usuarios</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
        </v-list-group>
        
        <!--Menu de Repostes-->
        <v-list-group> <!--menu desplegable para reporte-->
          <template slot="activator">
                <v-list-item-action>
                    <v-icon>insert_chart</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                  <v-list-item-title>Reportes</v-list-item-title>
                </v-list-item-content>
          </template>
          <v-list-item link ><!--menu de roles-->
            <v-list-item-action>
              <v-icon>picture_as_pdf</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Pedidos por periodo</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item link> <!-- MENU DE pedido despachados-->
            <v-list-item-action>
              <v-icon>picture_as_pdf</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Pedidos despachados</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item link> <!-- MENU DE pedido anuilados-->
            <v-list-item-action>
              <v-icon>picture_as_pdf</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Pedidos anulados</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-group>
      </v-list>
    
    </v-navigation-drawer>

    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      app
      color="blue darken-3"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title
        style="width: 600px"
        class="ml-0 pl-4"
      >
        <span class="hidden-sm-and-down">Sistema de Intermediacion Laboral</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn @click="logout()" icon>
        <v-icon
        >mdi mdi-logout</v-icon>
      </v-btn>
    </v-app-bar>
    <v-main>
      <v-container
        class="fill-height"
        fluid
      >
        <v-layout>
          <v-flex>
             <!-- Componentes Poner-->
              <router-view/>
          </v-flex>
        </v-layout>       
      </v-container>
    </v-main>
    <v-footer color="indigo" app>
      <span class="white--text">&copy; {{new Date().getFullYear()}} - Derechos Reservados - ITCHA AGAPE</span>
    </v-footer>
  </v-app>
</template>

<script>


export default {
  props: {
      source: String,
    },
  name: 'Home',


  components: {
  },

  data: () => ({
    drawer: null,
  }),
  methods:{
     logout(){
             let x = localStorage.getItem('token');
            let me = this,
            header = {
              headers: {
                "Authorization": "Bearer "+ x,
              },
            };
            console.log(x)
             me.$http.get(`${me.$url}/logout`,header)
            .then(function(response){ 
               if(response.status==200){ 
                  localStorage.clear();           
                  alert("Adios");
                  me.$router.push('/login')
                console.log(response.data);
               }                        
            })
            .catch(function(error){              
              console.log(error);
            });
          },

  },
  mounted(){
    let x =localStorage.getItem('token')
      if(x != null){
        console.log("Si tienes acceso");
      }else{
         
         this.$router.push('/login')
      }
       

  },
};
</script>
