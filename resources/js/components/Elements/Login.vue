<template>
    <form action="#" @submit.prevent="$emit('login', formData)">
        <div v-if="loginError"
             ref="loginErrorAlert"
             class="alert alert-danger alert-dismissible fade show"
             role="alert">
            <p class="mb-0">There was an error signing in.</p>
            <button type="button"
                    class="btn-close"
                    aria-label="Close"
                    data-bs-dismiss="alert"></button>
        </div>
        <div class="form-floating mb-3">
            <input v-model="formData.email"
                   type="email"
                   class="form-control"
                   id="login_email"
                   aria-describedby="emailHelp"
                   placeholder="Email Address" />
            <label for="login_email"
                   class="form-label">Email address</label>
            <div id="emailHelp"
                 class="form-text">We'll never share your email with anyone else.
            </div>
        </div>
        <div class="form-floating mb-3">
            <input v-model="formData.password"
                   type="password"
                   class="form-control"
                   id="login_password"
                   placeholder="Password"
                   autocomplete="false" />
            <label for="login_password"
                   class="form-label">Password</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember_me">
            <label class="form-check-label" for="remember_me">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script type="application/javascript">
    export default {
        data: () => {
            return {
                formData: {
                    email: "jstamm@example.net",
                    password: "dev",
                },
            };
        },
        methods: {
            closeAlert() {
                this.$refs.loginErrorAlert.classList.remove('show');
                setTimeout(() => this.$store.commit('hasLoginError', false), 250);
            }
        },
        computed: {
            loginError() {
                return this.$store.state.loginError;
            }
        },
        name: "Login"
    };
</script>

<style scoped>

</style>
