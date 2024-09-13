<template>
    <div class="container">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-login">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <a href="#" class="active" id="login-form-link">Login</a>
                </div>
              </div>
              <hr>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form id="login-form"  @submit.prevent="LoginData" style="display: block;">
                    <div class="form-group">
                      <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email"  v-model="user.email">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password"  v-model="user.password">
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
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
    </div>>
  </template>
  
  <script>

  export default {
      name: 'Login',
      data() {
          return {
              result: {},
              user: {
                  email: '',
                  password: ''
              },
              error: '',
              success: '',
          }
      },
      created() {
      },
      methods: {
        async LoginData() {
            try {
                const response = await axios.post("http://127.0.0.1:8000/api/login", this.user);
                if (response.data.status === true) {
                  this.error = '';
                  this.success = response.data.message || 'Usuario logueado exitosamente.';
                    //this.$router.push('/dashboard')
                } else {
                  this.success = '';
                  this.error = response.data.message || 'Error al realizar login usuario';
                }
            } catch (error) {
              this.success = '';
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