<template>
    <div class="container-fluid flex-grow-1">
        <div class="row justify-content-center align-items-center h-100 main-row">
            <div class="col-sm-8 col-md-7">
                <TitleHeader css-classes="home__header"
                             h-classes="display-1"
                             title="Clique Soapbox" />
                <hr>
                <div v-if="!secrets.length"
                     class="login-container">
                    <p class="lead">Please sign in. If you don't already have an account, please <a href="#">sign up</a>.</p>
                    <Login @login="handeLogin" />
                </div>
            </div>
        </div>
    </div>
</template>

<script type="application/javascript">
    import Login from "../Elements/Login.vue";
    import TitleHeader from "../Elements/TitleHeader.vue";
    
    export default {
        data() {
            return {
                secrets: [],
            };
        },
        methods: {
            handeLogin(formData) {
                // send axios request to the login route
                formData && axios
                    .get("/sanctum/csrf-cookie")
                    .then(() => {
                        axios.post("/login", formData)
                             .then(({status}) => {
                                 if (status === 200) {
                                     this.getSecrets();
                                     this.updateLoginErr(false);
                                 }
                             })
                             .catch(e => this.updateLoginErr(true));
                    })
                    .catch(e => this.updateLoginErr(true));
            },
            getSecrets() {
                axios
                    .get("/api/secrets/")
                    .then(({data, status}) => {
                        if (status === 200) {
                            this.secrets = data;
                            this.updateLoginErr(false);
                        }
                    })
                    .catch(e => {
                        this.secrets = [];
                        this.updateLoginErr(true);
                    });
            },
            updateLoginErr(error) {
                this.$store.commit("HAS_LOGIN_ERROR", error);
            },
        },
        computed: {
            // secrets() {
            //     return this.$store.state.secrets;
            // }
        },
        name: "Home",
        components: {TitleHeader, Login}
    };
</script>

<style scoped>

</style>
