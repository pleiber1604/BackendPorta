<template>
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-6">
                        <router-link to="/">
                           <span>Register</span>
                        </router-link>
                     </div>
                     <div class="col-xs-6">
                        <router-link to="/login">
                           <span>Login</span>
                        </router-link>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>
         </div>
      </div>
   </div>
   <router-view />
</template>