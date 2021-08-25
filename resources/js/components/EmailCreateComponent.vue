<template>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Envio de correo</div>

                <div class="card-body">
                    <form @submit.prevent="submit">
                        
                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">Asunto</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" 
                                    required
                                    v-model="form.subject"
                                    autofocus>
                                <span class="text-danger" v-if="errors && errors.subject">
                                    {{ errors.subject[0] }}
                                </span>            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo destinatario</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="form.email"  required autocomplete="email">
                                <span class="text-danger" v-if="errors && errors.email">
                                    {{ errors.email[0] }}
                                </span>  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">Mensaje</label>

                            <div class="col-md-6">
                                <textarea id="message"  class="form-control" v-model="form.message" cols="30" rows="10"></textarea>
                                <span class="text-danger" v-if="errors && errors.message">
                                    {{ errors.message[0] }}
                                </span> 
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: [
        'csrf'
    ],
    data() {
        return {
            errors:null,
            form: {
                subject:'',
                message: '',
                email: ''
            }
        }
    },
    methods: {
        submit() {
            let data = new FormData();
            for (let key in this.form){
                data.append(key, this.form[key]);
            }

            axios
            .post(`${window.location.origin}/email/create`, data)
            .then(response => {
                this.$fire({
                    title: "Envio de correo",
                    text: "Correo enviado exitosamente",
                    type: "success",
                    timer: 3000
                }).then(r => {
                   // window.location = `${window.location.origin}/users`
                });
            })
            .catch(error => {
                if(error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            });
        },
    }
}
</script>

<style>
</style>