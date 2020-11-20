
<template>
  <v-form v-model="valid" ref="FormPerfil" >
    <thead style="font-size:40px;align:center;">Registro de Perfil Ocupacional de Graduado</thead>
    <v-divider class="black"></v-divider>
    <thead style="font-size:25px">I.Datos Personales</thead>
    <v-divider class="black"></v-divider>
    <v-container>
      <!--v-row parte 1-->
      <v-row>
         <!--nombre-->
        <v-col cols="12" md="6">
          <v-text-field
            value="aspirante.nombres"
            disabled
          ></v-text-field>
        </v-col>
        <!--Apellido-->
        <v-col cols="12" md="6">
          <v-text-field
            value="aspirante.apellidos"
            disabled
          ></v-text-field>
        </v-col>
        <!--datepicker de nacimiento-->
        <v-col cols="12" md="6">
          <v-text-field
            v-model="formulario.fecha_nac"
            value="egresado.fecha_nac"
            disabled
          ></v-text-field>
        </v-col>
      <!--lugar de nacimiento-->
      <v-col cols="12" md="6">
          <v-text-field
            v-model="formulario.lugar_nac"
            :rules="bornRules"
            label="Lugar de Nacimiento"
            required
          ></v-text-field>
        </v-col>
        <!--Direccion-->
      <v-col cols="12" md="4">
          <v-text-field
            value="egresado.direccion"
            disabled
          ></v-text-field>
        </v-col>
        <!--estado civil-->
      <v-col cols="12" md="4">
           <v-select
           v-model="formulario.estado_civil"
          :items="arrayEstadoCivil"
          label="Estado Civil"
          item-text="nombre"
          item-value="id"
          return-object
          clearable
          :menu-props="{ closeOnClick: true }"
        ></v-select>
        </v-col>
        <!--Numero de telefono-->
      <v-col cols="12" md="4">
          <v-text-field
           value="egresado.celular"
           disabled
          ></v-text-field>
        </v-col>
        <!--DUI-->
        <v-col cols="12" md="3">
          <v-text-field
            value="egresado.dui"
            disabled
          ></v-text-field>
        </v-col>
        <!--NIT-->
        <v-col cols="12" md="3">
          <v-text-field
            v-model="formulario.nit"
            :rules="nitRules"
            label="Nit"
            required
          ></v-text-field>
        </v-col>
          <!--Pasaporte-->
        <v-col cols="12" md="3">
          <v-text-field
            v-model="formulario.pasaporte"
            :rules="passportRules"
            label="Pasaporte"
            required
          ></v-text-field>
        </v-col>
         <!--NUP-->
        <v-col cols="12" md="3">
          <v-text-field
            v-model="formulario.nup"
            :rules="nupRules"
            label="NUP"
            required
          ></v-text-field>
        </v-col>
         <!--Nacionalidadd-->
        <v-col cols="12" md="4">
          <v-text-field
            v-model="formulario.nacionalidad"
            :rules="nacionRules"
            label="Nacionalidad"
            required
          ></v-text-field>
        </v-col>
        <!--2 Idioma-->
        <v-col cols="12" md="4">
          <v-autocomplete
            v-model="formulario.idioma"
            :items = "arrayIdioma"
            label="Segundo Idioma"
            item-text="nombre"
            item-value="id"
            return-object
            clearable
            :menu-props="{ closeOnClick: true }"
          ></v-autocomplete>
        </v-col>
        <!--nivel de Idioma-->
        <v-col class="d-flex" cols="12" md="4">
        <v-select
          v-model="formulario.nivel_idioma"
          :items="items"
          label="Nivel de Segundo Idioma"
        ></v-select>
        </v-col>
      </v-row>
      <v-divider class="black"></v-divider>
      <thead style="font-size:25px">II.Estado De Salud</thead>
      <v-divider class="black"></v-divider>
      <!--v-row parte 2-->
      <v-row>
      <!--Enfermemdad Cronica-->
        <v-col cols="12" md="6">
          <v-select
            v-model="formulario.enfermedad_mencion"
            :items="yesno"
            label="Padece alguna Enfermedad Cronica?"
          ></v-select>
        </v-col>
         <!--si?Enfermemdad Cronica-->
        <v-col cols="12" md="6">
          <v-select
            v-model="formulario.enfermedad"
            :items="arrayEnfermedades"
            label="Si? Seleccione"
            item-text="nombre"
            item-value="id"
            return-object
            clearable
            :menu-props="{ closeOnClick: true }"
          ></v-select>
        </v-col>
        <!--Medicamentos-->
        <v-col cols="12" md="6">
          <v-select
            v-model="formulario.medicamento_perma"
           :items="yesno"
            label="Necesita Medicamentos Permanentes?"
          ></v-select>
        </v-col>
         <!--Si?Medicamentos-->
        <v-col cols="12" md="6">
          <v-text-field
            v-model="formulario.enfermedad_mencion"
            label="Si? Mencionar"
          ></v-text-field>
        </v-col>
        <!--Discapacidad-->
        <v-col cols="12" md="12">
          <v-select
            v-model="formulario.discapacidad"
            :items="yesno"
            label="Posee Algun Tipo de Discapacidad?"
          ></v-select>
        </v-col>
      </v-row>
      <v-divider class="black"></v-divider>
      <thead style="font-size:25px">III.Informacion Academica</thead>
      <v-divider class="black"></v-divider>
      <!--v-row parte 3-->
      <v-row>
        <!--nivel academico-->
        <v-col cols="12" md="3">
          <v-text-field
            v-model="formulario.nivel_academico"
            label="Nivel Academico"
          ></v-text-field>
        </v-col>
         <!--institucion-->
        <v-col cols="12" md="3">
          <v-text-field
            v-model="formulario.institucion_formadora"
            label="Institucion Formadora"
          ></v-text-field>
        </v-col>
        <!--Graduacion-->
        <v-col cols="12" md="3">
          <v-select
            v-model="formulario.anio_graduacion"
            :items="anios"
            label="Año de Graduacion?"
          ></v-select>
        </v-col>
         <!--Practica Pro-->
        <v-col class="d-flex" cols="12" md="3">
        <v-select
          v-model="formulario.practica_pro"
          :items="yesno"
          label="Ha Realizado Practica Profecional?"
        ></v-select>
        </v-col>
        <!--Cursos-->
        <v-col cols="12" md="12">
        <v-textarea
          v-model="formulario.cursos_informacion"
          name="txaCurso"
          label="Cursos de Informacion"
          value=""
          hint="Escriba Los Cursos"
          ></v-textarea>
          </v-col>
          <!--Oficios-->
          <v-col cols="12" md="12">
          <v-textarea
            v-model="formulario.oficios_realizar"
            name="txaOficio"
            label="Oficios que Puede Realizar"
            value=""
            hint="Escriba Los Oficios"
          ></v-textarea>
          </v-col>
          <!--Formacion empre-->
          <v-col class="d-flex" cols="12" md="4 ">
          <v-select
            v-model="formulario.formacion_emprende"
            :items="yesno"
            label="Formacion de Emprendimiento?"
          ></v-select>
          </v-col>
          <!--institucion emprende-->
          <v-col cols="12" md="4">
            <v-text-field
              v-model="formulario.instituto_formador_emprede"
              label="Institucion formadora de Emprendimiento"
            ></v-text-field>
          </v-col>
          <!--anio de formacion-->
          <v-col cols="12" md="2">
            <v-text-field
              v-model="formulario.anio_formacion"
              label="Año de Formacion"
            ></v-text-field>
          </v-col>
           <!--Idea Negogio-->
          <v-col class="d-flex" cols="12" md="2">
          <v-select
            v-model="formulario.idea_negocio"
            :items="yesno"
            label="Tiene Alguna Idea de Negocio?"
          ></v-select>
          </v-col>
        </v-row>
         <v-divider class="black"></v-divider>
          <thead style="font-size:25px">IV.Experiencia Laboral</thead>
        <v-divider class="black"></v-divider>
      <!--v-row parte 4-->
        <v-row>
          <!--Experiencia laboral-->
          <v-col class="d-flex" cols="12" md="4">
          <v-select
            v-model="formulario.experecia_laboral"
            :items="yesno"
            label="Posee Experiencia Laboral?"
          ></v-select>
          </v-col>
          <!--periodo empleo-->
          <v-col cols="12" md="4">
            <v-text-field
              v-model="formulario.ultimo_periodo_trabajo"
              label="Periodo de Ultimo Empleo"
            ></v-text-field>
          </v-col>
          <!--cargo-->
          <v-col cols="12" md="4">
            <v-text-field
              v-model="formulario.cargo_desempenado"
              label="Cargo desempeñado"
            ></v-text-field>
          </v-col>
           <!--habilidades-->
          <v-col cols="12" md="12">
          <v-textarea
            v-model="formulario.habilidades_personales"
            name="txaHabilidades"
            label="Habilidades, Caracteristicas o actividades personales en que se destaca o hace bien"
            value=""
            hint="Escriba sus Habilidades, Caracteristicas o actividades"
          ></v-textarea>
          </v-col>
           <!--dificultades-->
          <v-col cols="12" md="12">
          <v-textarea
            v-model="formulario.dificultades_personales"
            name="txaDificultades"
            label="Dificultades, Caracteristicas o actividades personal que debe mejorar o aprender"
            value=""
            hint="Escriba sus Dificultades, Caracteristicas o actividades"
          ></v-textarea>
          </v-col>
           <thead style="font-size:20px;" >Habitos Laborales:</thead>
           <v-divider vertical="true" ></v-divider>
           <!--asistencia-->
          <v-col class="d-flex" cols="12" md="3">
          <v-select
            v-model="formulario.asistencia"
            :items="yesno"
            label="Asistencia"
          ></v-select>
          </v-col>
          <!--puntualidead-->
          <v-col class="d-flex" cols="12" md="3">
          <v-select
            v-model="formulario.puntualidad"
            :items="yesno"
            label="Puntualidad"
          ></v-select>
          </v-col>
          <!--responsabilidad-->
          <v-col class="d-flex" cols="12" md="3">
          <v-select
            v-model="formulario.responsabilidad"
            :items="yesno"
            label="Responsabilidad"
          ></v-select>
          </v-col>
           <!--disponabilidad empleo-->
          <v-col class="d-flex" cols="12" md="6">
          <v-select
            v-model="formulario.disponibilidad_horaria"
            :items="time"
            label="Disponibilidad Horaria para empleo"
          ></v-select>
          </v-col>
           <!--disponabilidad empleo--> <!--falta en la migracion y en la bd-->
          <v-col class="d-flex" cols="12" md="6">
          <v-select
            
            :items="yesno"
            label="Disponibilidad Para Trasladarse Fuera de Chalatenango"
          ></v-select>
          </v-col>
          <!--recomendaciones-->
          <v-col cols="12" md="12">
          <v-textarea
            v-model="formulario.recomendacion_derivacion"
            name="txaRecomen"
            label="Recomendacion de deviracion"
            value=""
            hint="Escriba Recomendaciones"
          ></v-textarea>
          </v-col>
          <!--otras observaciones-->
          <v-col cols="12" md="12">
          <v-textarea
            v-model="formulario.otra_observacion"
            name="txaOtras"
            label="Otras Observaciones"
            value=""
            hint="Escriba sus Observaciones"
          ></v-textarea>
          </v-col>
        </v-row>
    </v-container>
    <v-divider class="black"></v-divider>
    <template>
    <v-btn block color="purple" dark  
      elevation="8"
      @click="saveForm()"
    >Enviar</v-btn>
    </template>
  </v-form>
  
</template>

<script>
  export default {
    
    data: () => ({
      arrayAspirante:[],
      arrayAlumno:[],
      arrayIdioma:[],
      arrayEnfermedad:[],
      arrayForm:[],
      arrayEstadoCivil:[],
      idioma:{
        id:null,
        nombre:""
      },
      enfermedad:{
        id:null,
        nombre:""
      },
      estado:{
        id:null,
        nombre:""
      },
      aspirante:{
        id: null,
        nombres: "",
        apellidos: "",
        articulado: "",
        telefono: ""
      },
      egresado:{
        id: null,
        aspirante: null,
        fecha_nac: "",
        celular:"",
        dui:"",
        direccion: ""
      },
      formulario:{
        id: null,
        aspirante: null,
        lugar_nac:"",
        idestado_civil:"",
        nit:"",
        pasaporte:"",
        licencia_conducir:"",
        nup:"",
        idioma:null,
        nivel_idioma:"",
        nacionalidad:"",
        enfermedad:null,
        enfermedad_mencion:"",
        medicamento_perma:"",
        medicamento_mencion:"",
        discapacidad:"",
        nivel_academico:"",
        institucion_formadora:"",
        anio_graduacion:"",
        practica_pro:"",
        cursos_informacion:"",
        oficios_realizar:"",
        formacion_emprende:"",
        idea_negocio:"",
        instituto_formador_emprede:"",
        anio_formacion:"",
        experecia_laboral:"",
        ultimo_periodo_trabajo:"",
        cargo_desempenado:"",
        habilidades_personales:"",
        dificultades_personales:"",
        asistencia:"",
        puntualidad:"",
        responsabilidad:"",
        disponibilidad_horaria:"",
        recomendacion_derivacion:"",
        otra_observacion:""
      },
      items: ['Basico', 'Intermedio', 'Avanzado'],
      yesno: ['Si', 'No'],
      time: ['Tiempo Completo', 'Medio Tiempo', 'Por Horas'],
      anios:['2015','2016','2017','2018','2019','2020'],
      valid: false,
    
      bornRules: [
        v => !!v || 'Lugar de Nacimiento es requerido',
      ],
      livePlace: '',
      liveRules: [
        v => !!v || 'Direccion de Residencia es requerido',
      ],
      civilStatus: '',
      civilRules: [
        v => !!v || 'Estado Civil es requerido',
      ],
      phonePlace: '',
      phoneRules: [
        v => !!v || 'Numero Telefonico es requerido',
        v => /^([0-9])*$/.test(v) || 'Formato no valido',
      ],
      
      nit: '',
      nitRules: [
        v => !!v || 'El Numero de NIT es requerido',
      ],
      passport: '',
      passportRules: [
        v => !!v || 'Pasaporte es requerido',
      ],
      nup: '',
      nupRules: [
        v => !!v || 'NUP es requerido',
      ],
      nacio: '',
      nacionRules: [
        v => !!v || 'Nacionalidad es requerido',
      ]
    }),
    computed: {
      
    },
    methods: {
       fetchAspirantes(aspirante) {        
        let me = this;  
        me.aspirante.id = me.$store.state.id;
        me.$http.get(`${me.$url}/aspirante` + me.aspirante.id)
        .then(function(response){
            console.log(response.data)
          me.arrayAspirante = response.data;
          me.arrayAspirante.unshift(aspirante)
        })
        .catch(function(error){
          console.log(error);
        });
      },
       fetchEgresado(egresado) {        
        let me = this;          
        me.aspirante.id = me.$store.state.id;
        me.$http.get(`${me.$url}/egresado` + me.aspirante.id)
        .then(function(response){
            console.log(response.data)
          me.arrayAlumno = response.data;
          me.arrayAlumno.unshift(egresado)
        })
        .catch(function(error){
          console.log(error);
        });
      },
       fetchIdiomas(idioma) {        
        let me = this;          
        me.$http.get(`${me.$url}/idioma`)
        .then(function(response){
            console.log(response.data)
          me.arrayIdioma = response.data;
           me.arrayIdioma.unshift(idioma)
        })
        .catch(function(error){
          console.log(error);
        });
      },
      fetchEstados(estado) {        
        let me = this;          
        me.$http.get(`${me.$url}/estadocivil`)
        .then(function(response){
            console.log(response.data)
          me.arrayEstadoCivil = response.data;
           me.arrayEstadoCivil.unshift(estado)
        })
        .catch(function(error){
          console.log(error);
        });
      },
      fetchEnfermadades(enfermedad) {        
        let me = this;          
        me.$http.get(`${me.$url}/enfermedad`)
        .then(function(response){
            console.log(response.data)
          me.arrayEnfermedad = response.data;
           me.arrayEnfermedad.unshift(enfermedad)
        })
        .catch(function(error){
          console.log(error);
        });
      },
      saveForm(){
          let me = this;
          me.aspirante.id = me.$store.state.id;
          if (me.$refs.formAreas.validate()) {
            let accion ="add";
            if(accion=="add"){
              me.$http.post(`${me.$url}/perfil`, me.formulario)
                .then(function(response) {
                me.verificarDatos(response.data, response.status, accion);
              })
              .catch(function(error) {
                console.log(error);
                me.$swal("Error", "Ocurrio Un Error Intente Nuevamente", "error");
              });
            }
          }     
      },
      verificarDatos(formulario, statusCode, accion){
        let me = this;

        const Toast = me.$swal.mixin({
          toast: true,
          position: "bottom-end",
          showConfirmButton: true,
          timer: 3000
        });

        switch (accion) {
          case "add":
            me.arrayForm.unshift(formulario);
            Toast.fire({
              icon: "success",
              title: "Formulario Enviado Correctamente"
            });
            break;
            }
      }

    },
    mounted() {
      let x =localStorage.getItem('token')
      if(x != null){
        this.saveForm(); 
      }else{
         
         this.$router.push('/login')
      }
      let me = this;
      me.fetchAspirantes();
      me.fetchEstados();
      me.fetchEnfermadades();
      me.fetchIdiomas();
      me.fetchEgresado();
    },
  }
</script>