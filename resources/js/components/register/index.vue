

<template>
  <div class="container">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <a href="#" class="active" id="login-form-link">Register</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="register-form"  @submit.prevent="registerUser" role="form" style="display: block;">
              <div class="form-group">
                <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" v-model="user.name">
              </div>
              <div class="form-group">
                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" v-model="user.email">
              </div>
              <div class="form-group">
                <input type="text" name="phone_number" id="phone_number" tabindex="1" class="form-control" placeholder="Phone Number" v-model="user.phone_number">
              </div>
              <div class="form-group">
                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" v-model="user.password">
              </div>
              <div class="form-group">
                <input type="file"  name="profile_image" id="profile_image"  placeholder="Imagen de perfil"  @change="handleFileUpload" />
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Registrar">
                  </div>
                </div>
              </div>
            </form>
            <div v-if="error" class="alert alert-danger">{{ error }}</div>
            <div v-if="success" class="alert alert-success">{{ success }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'Register',
    data() {
        return {
            result: {},
            user: {
                name: '',
                email: '',
                phone_number:'',
                password: '',
                profile_image: null,
            },
            error: '',
            success: '',
        }
    },
    created() {
    },
    mounted() {
       
    },
    methods: {
        handleFileUpload(event) {
            this.user.profile_image = event.target.files[0];
        },
        async  registerUser() {
            this.error = '';
            this.success = '';
            try {
                const response = await axios.post("http://127.0.0.1:8000/api/register", this.user, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                });            
                if (response.data.status === true) {
                  this.error = '';
                  this.success = response.data.success || 'Usuario registrado exitosamente.';
                 
                } else {
                  this.success='';
                  this.error = 'Error al registrar usuario';
                }
            } catch (error) {
              this.success='';
              if (error.response) {
                
                  const errors = error.response.data.errors;
                  
                  if (errors) {
                    let allErrorMessages = '';  
                 
                      for (const [field, messages] of Object.entries(errors)) {
                          messages.forEach(message => {                            
                              allErrorMessages += `Error en ${field}: ${message}\n`;
                          
                          });
                      }
                      this.error = allErrorMessages;
                    
                  } else {
                    this.error = error.response.data.message;                     
                  }
              } else if (error.request) {                            
                  this.error = 'No se recibió respuesta:'+ error.request;
              } else {                  
                this.error = 'Error'+ error.message;
              }
              
            }

        }
    }
}
</script>