<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" :class="{'form-control': true, 'is-invalid': errors.hasOwnProperty('email')}" name="email" v-model="form.email" required autocomplete="email" autofocus>

                                <span class="invalid-feedback" role="alert" v-if="errors.hasOwnProperty('email') && errors.email.length">
                                    <strong>{{ errors.email[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" :class="{'form-control': true, 'is-invalid': errors.hasOwnProperty('password')}" name="password" v-model="form.password" required autocomplete="current-password">

                                <span class="invalid-feedback" role="alert" v-if="errors.hasOwnProperty('password') && errors.password.length">
                                    <strong>{{ errors.password[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" @click.prevent="login">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Login from './Login';
export default Login;
</script>
