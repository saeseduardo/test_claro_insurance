<template>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar Usuario</div>

                <div class="card-body">
                    <form @submit.prevent="submit">
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" 
                                    required
                                    v-model="form.name"
                                    autofocus>
                                <span class="text-danger" v-if="errors && errors.name">
                                    {{ errors.name[0] }}
                                </span>            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="form.email"  required autocomplete="email">
                                <span class="text-danger" v-if="errors && errors.email">
                                    {{ errors.email[0] }}
                                </span>  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cell_phone_number" class="col-md-4 col-form-label text-md-right">Numero telefonico</label>

                            <div class="col-md-6">
                                <input id="cell_phone_number" type="number" class="form-control" v-model="form.cell_phone_number">
                                <span class="text-danger" v-if="errors && errors.cell_phone_number">
                                    {{ errors.cell_phone_number[0] }}
                                </span> 
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="identification_card" class="col-md-4 col-form-label text-md-right">Cedula de identidad</label>

                            <div class="col-md-6">
                                <input id="identification_card" type="text" class="form-control" v-model="form.identification_card" required>
                                <span class="text-danger" v-if="errors && errors.identification_card">
                                    {{ errors.identification_card[0] }}
                                </span> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control" v-model="form.date_of_birth" required>
                                <span class="text-danger" v-if="errors && errors.date_of_birth">
                                    {{ errors.date_of_birth[0] }}
                                </span> 
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Pais de recidencia</label>

                            <div class="col-md-6">
                                <select id="countries" class="form-control" v-model="selectCountry" v-on:change="getStates()">
                                    <option disabled value="">Seleccione pais de recidencia</option>
                                    <option v-for="country in countries" v-bind:key="country.country_short_name" v-bind:value="country.country_name">{{ country.country_name }}</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">
                                <select id="states" class="form-control" v-model="selectState" v-on:change="getCities()">
                                    <option disabled value="">Seleccione un estado</option>
                                    <option v-for="state in states" v-bind:key="state.state_name" v-bind:value="state.state_name">{{ state.state_name }}</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Ciudad</label>

                            <div class="col-md-6">
                                <select id="cities" class="form-control" v-model="form.city_code">
                                    <option disabled value="">Seleccione una ciudad</option>
                                    <option v-for="city in cities" v-bind:key="city.city_name" v-bind:value="city.city_name">{{ city.city_name }}</option>
                                </select>
                                <span class="text-danger" v-if="errors && errors.city_code">
                                    {{ errors.city_code[0] }}
                                </span>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="form.password" required autocomplete="new-password">
                                <span class="text-danger" v-if="errors && errors.password">
                                    {{ errors.password[0] }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" v-model="form.password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
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
            countries:null,
            states:null,
            cities:null,
            errors:{},
            selectCountry: '',
            selectState: '',
            form: {
                name:'',
                city_code: '',
                email: '',
                cell_phone_number: '',
                identification_card: '',
                date_of_birth: '',
                password: '',
                password_confirmation: ''
            }
        }
    },
    created() {

        var headers = {
            "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJlZHVhcmRvZGV2MDhAZ21haWwuY29tIiwiYXBpX3Rva2VuIjoibnAzUlYtTXRNcE1EdVNWb3l0RmxnaDRsT1d6WFp3M2xseE8wNEhYTUJ0NVNqdGxBUDJtdmFnelpiSENjTnNwQm1payJ9LCJleHAiOjE2Mjk5NDQ5NTF9.NwNkcbZ3FVc4cta0spUlHA-e5TXfOFbHsmLComzu4vE",
            "Accept": "application/json"
        };

        axios
        .get('https://www.universal-tutorial.com/api/countries', {headers})
        .then(response => this.countries = response.data)
    },
    methods: {
        getStates() {
            let headers = {
                "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJlZHVhcmRvZGV2MDhAZ21haWwuY29tIiwiYXBpX3Rva2VuIjoibnAzUlYtTXRNcE1EdVNWb3l0RmxnaDRsT1d6WFp3M2xseE8wNEhYTUJ0NVNqdGxBUDJtdmFnelpiSENjTnNwQm1payJ9LCJleHAiOjE2Mjk5NDQ5NTF9.NwNkcbZ3FVc4cta0spUlHA-e5TXfOFbHsmLComzu4vE",
                "Accept": "application/json"
            };

            axios
            .get(`https://www.universal-tutorial.com/api/states/${this.selectCountry}`, {headers})
            .then(response => this.states = response.data)
        },
        getCities() {
            let headers = {
                "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJlZHVhcmRvZGV2MDhAZ21haWwuY29tIiwiYXBpX3Rva2VuIjoibnAzUlYtTXRNcE1EdVNWb3l0RmxnaDRsT1d6WFp3M2xseE8wNEhYTUJ0NVNqdGxBUDJtdmFnelpiSENjTnNwQm1payJ9LCJleHAiOjE2Mjk5NDQ5NTF9.NwNkcbZ3FVc4cta0spUlHA-e5TXfOFbHsmLComzu4vE",
                "Accept": "application/json"
            };

            axios
            .get(`https://www.universal-tutorial.com/api/cities/${this.selectState}`, {headers})
            .then(response => this.cities = response.data)
        },
        submit() {
            let data = new FormData();
            for (let key in this.form){
                data.append(key, this.form[key]);
            }

            axios
            .post(`${window.location.origin}/users/create`, data)
            .then(response => {
                this.$fire({
                    title: "Edicion de usuario",
                    text: "Usuario editado exitosamente",
                    type: "success",
                    timer: 3000
                }).then(r => {
                    window.location = `${window.location.origin}/users`
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