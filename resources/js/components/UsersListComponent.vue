<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                        <a class="btn btn-sm btn-primary mb-4">Registrar Usuarios</a>
                        <table class="table table-striped" id="table-users">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Cedula de identidad</td>
                                    <td>Numero de telefono</td>
                                    <td>Ciudad</td>
                                    <td>Nombre</td>
                                    <td>Correo</td>
                                    <td>Accion</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in usersList" v-bind:key="user.id">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.identification_card }}</td>
                                    <td>{{ user.cell_phone_number }}</td>
                                    <td>{{ user.city_code }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>
                                        <p>Actualizar</p>
                                        <p>Eliminar</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import 'jquery/dist/jquery.min.js';
    import "datatables.net-dt/js/dataTables.dataTables"
    import "datatables.net-dt/css/jquery.dataTables.min.css"
    import $ from 'jquery'; 

    export default {
        props: [
            'users'
        ],
        data() {
            return {
                usersList: this.users
            }
        },
        mounted() {
            $('#table-users').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
            });
        }
    }
</script>
