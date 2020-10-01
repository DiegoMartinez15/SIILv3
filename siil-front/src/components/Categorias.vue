<template>
<div class="content">
  <div class="md-layout-item md-medium-size-100 md-xsmall-sixe-100 md-size-100">
    <v-overlay :value="loader" :z-index="'99999999'">
        <v-progress-circular indeterminate size="80" color="grey darken-4"></v-progress-circular>
    </v-overlay>
    <v-card>
      <v-card-title>
        Listado de Categorias de Productos
       <div class="flex-grow-1"></div>
        <v-text-field
          v-model="searchCategorias"
          append-icon="search"
          label="Buscar"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
      <v-data-table
        
        :headers="hTBCategorias"
        :items="arrayCategorias"
        :footer-props="{
          'items-per-page-options' :[5,10,15,20,30],
          'items-per-page-text' :'Registros por Página'
        }"
        :items-per-page="5"
        :search="searchCategorias"
        multi-sort
        class="elevation-5 text--center ml-80"
      >
      <!-- Templeate para form modal para agregar o actualizar categorias-->
    <template v-slot:top>
      <v-toolbar flat color="white">
        <div class="flex-grow-1"></div>
        <v-dialog v-model="modalCategoria" persistent max-width="700px">
          <template v-slot:activator="{ on }">
            <v-btn elevation="10" color="grey darken-3" dark class="mb-2" v-on="on">
              Agregar&nbsp;
              <v-icon>library_add</v-icon>
            </v-btn>
          </template>
          <v-card>
            <v-card-title class="headline grey lighten-2" primary-titles>
              <span class="headline" v-text="formTitle"></span>
            </v-card-title>
            <v-card-text>
              <v-container>
                <v-form ref="formCategoria" v-model="validForm" :lazy-validation="true">
                  <v-text-field
                   append-icon="mdi-folder-outline"
                   v-model="categoria.nombre"
                   @keyup="errorsNombre = []"
                   :rules="[v => !!v || 'Nombre Es Requerido']"
                   label="Nombre"
                   required
                   :error-messages="errorsNombre"
                  ></v-text-field>
                </v-form>
              </v-container>
            </v-card-text>
            <v-divider></v-divider>           
              <v-card-actions>
                <div class="flex-grow-1"></div>
                <v-btn color="red darken-1" text @click="cerrarModal">Cerrar</v-btn>
                <v-btn
                  color="info darken-1"
                  :disabled="!validForm"
                  @click="saveCategoria()"
                  text
                  v-text="btnTitle"
                ></v-btn>
              </v-card-actions>          
          </v-card>
        </v-dialog>
      </v-toolbar>
</template>
      <!--Template para la columna de acciones -->
      <template v-slot:item.action="{item}">
        <v-tooltip top>
          <template v-slot:activator="{on}">
            <v-btn
              color="success"            
              elevation="8"
              small
              dark
              :disabled="item.id<0"
              v-on="on"
              @click="showModalEditar(item)"
            >
            <v-icon>create</v-icon>
            </v-btn>
          </template>
          <span>Actualizar Datos</span>
        </v-tooltip>
        &nbsp;&nbsp;
        <v-tooltip top>
          <template v-slot:activator="{on}">
            <v-btn
              color="info"            
              elevation="8"
              small
              dark
              :disabled="item.id < 0"
              v-on="on"
              @click="deleteCategoria(item)"
            >
            <v-icon>delete</v-icon>
            </v-btn>
          </template>
          <span>Eliminar Registro</span>
        </v-tooltip>
      </template>
      <v-snackbar v-model="snackbar">
          {{ msjSnackBar}}
          <v-btn color="red" text @click="snackbar = false">Cerrar</v-btn>
      </v-snackbar>
      </v-data-table>
    </v-card>
  </div>
</div>
  
</template>

<script>
  export default {
    data () {
      return {
        arrayCategorias:[],
        hTBCategorias:[
          {text:"Nombre", value:"nombre"},
          {text:"Acciones", value:"action",sortable:false,aling:"center"},
        ],
        loader:false,
        searchCategorias:"",
        modalCategoria:false,
        categoria:{
          id:null,
          nombre:"",
        },
        validForm:true,
        snackbar:false,
        msjSnackBar:"",
        errorsNombre:[],
        editedCategoria:-1,
      };
    },
    computed: {
      formTitle(){
        return this.categoria.id == null
        ? "Agregar Categoria"
        : "Actualizar Categoria";
      },
      btnTitle(){
        return this.categoria.id == null ? "Guardar" : "Actualizar";
      },
    },
    methods: {
      fetchCategorias() {
        let me = this;
        me.loader = true;
        me.$http
        .get(`${me.$url}/areas`)
        .then(function(response){
            console.log(response.data)
          me.arrayCategorias = response.data;
          me.loader = false;
        })
        .catch(function(error){
          me.loader = false;
          console.log(error);
        });
      },
      cerrarModal(){
        let me = this;
        me.modalCategoria = false;
        setTimeout(() => {
          me.categoria={
            id:null,
            nombre:"",
          };
          me.resetValidation();
        }, 300);
      },
      resetValidation() {
        let me = this;
        me.errorsNombre = [];
        me.$refs.formCategoria.resetValidation();
      },
      showModalEditar(cat) {
        let me = this;
        me.editedCategoria = me.arrayCategorias.indexOf(cat);
        me.categoria = Object.assign({},cat);
        me.modalCategoria = true;
      },
      saveCategoria() {
        let me = this;
       
        if(me.$refs.formCategoria.validate()) {
          let accion = me.categoria.id == null ? "add" : "upd";
          me.loader = true;
          me.$http
            .post(`${me.$url}/areas`, me.categoria)
            .then(function(response) {
              me.verificarAccionDato(response.data, response.status, accion);
              me.cerrarModal();
            })
            .catch(function(error) {
              console.log(error);
              //409 conflicts Error (Proveedor ya existe en la base de datos)
              if(error.response.status == 409) {
                me.setMessageToSnackBar("Categoria Ya Existente", true);
                me.errorsNombre = ["Nombre de Categoria Existente"];
              }else {
                me.$swal("Error", "Ocurrido Un Error Intente de Nuevovamente", "error");
              }
              me.loader = false;
            });
        }
      },
      setMessageToSnackBar(msj, estado) {
        let me = this;
        me.snackbar = estado;
        me.msjSnackBar = msj;
      },
      deleteCategoria(categoria) {
        let me = this;
        me.editedCategoria = me.arrayCategorias.indexOf(categoria);
         const Toast = me.$swal.mixin({
           toast: true,
           position: "bottom-end",
           showConfirmButton: true,
           timer: 3000
         });
         me.$swal({
           title: "Eliminar Categoria?",
           text: "Una vez realizada la accion no se podra revertir ",
           icon: "question",
           showCancelButton: true,
           confirmButtonText: "Si",
           cancelButtonText: "No",
           reverseButtons: true,
           focusConfirm: false,
           focusCancel: true,
           showCloseButton: true
         }).then(result => {
           if (result.value) {
             me.loader = true;
             me.$http
              .post(`${me.$url}/categorias/delete`,categoria)
              .then(function(response){
                me.verificarAccionDato(response.data, response.status, "del");
                me.loader = false;
              })
              .catch(function(error) {
                if(error.response.status == 510){
                  Toast.fire({
                    icon: "error",
                    title: "No se puede eliminar esta Categoria, tiene productos registrados"
                  });
                }
                me.loader = false;
              });
           }
         });
      },
      verificarAccionDato(categoria, statusCode, accion) {
        let me = this;

        const Toast = me.$swal.mixin({
          toast: true,
          position: "bottom-end",
          showConfirmButton: true,
          timer: 3000
        });

        switch (accion) {
          case "add":
            //Agrego al array de categorias el objeto que devuelve el backend
            me.arrayCategorias.unshift(categoria);
            Toast.fire({
              icon: "success",
              title: "Categoria Registrada con Exito"
            });
            me.loader = false;
            break;

          case "upd":
            //Actualizando al array de categorias el objeto que devuelve el Backend ya con los datos
            Object.assign(me.arrayCategorias[me.editedCategoria], categoria);
            Toast.fire({
              icon:"success",
              title: "Categoria Actualizada con Exito"
            });
            me.loader = false;
            break;
          case "del":
            if (statusCode == 200) {
              try{
                //se elimina del array de categorias activos si todo esta bien en el backend
                me.arrayCategorias.splice(me.editedCategoria, 1);
                //se lanza mensaje final
                me.$swal.fire("Eliminado", "Categoria Eliminada", "success");
              }catch (error) {
                console.log(error);
              }
            }else {
              Toast.fire({
                icon: "error",
                title: "Ocurrido un Error Intente Nuevamente"
              });
            }
            break;
        }
      }
    },
    mounted() {
      let me = this;
      me.fetchCategorias();     
    },
  };
</script>