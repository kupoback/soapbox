<template>
    <Layout row-classes="justify-content-center align-items-center">
        <template v-slot:body>
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
        </template>
    </Layout>
</template>

<script type="application/javascript">
    import Layout from "../Layout/Layout.vue";
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
        components: {Layout, TitleHeader, Login}
    };
</script>

<style scoped>

</style>
