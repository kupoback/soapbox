<template>
    <div class="container-fluid flex-grow-1 d-flex overflow-scroll">
        <div class="row main-row profile-row">
            <Sidebar />
            <section class="col-12 col-md-9 col-lg offset-xl-1 main-content profile-content">
                <div class="row row-full-height py-4">
                    <div class="col-12 profile__header mb-5">
                        <h1>Update Profile</h1>
                    </div>
                    
                    <div class="col-12 profile__info">
                        <form>
                            <div class="row mb-3">
                                <label for="profile-username"
                                       class="col-lg-3 col-form-label form-label">Username</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="profile-username"
                                           placeholder="Username">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="profile-name" class="col-lg-3 col-form-label form-label">Your Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="profile-name" placeholder="Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="exampleInputEmail1" class="col-lg-3 col-form-label form-label">Email address</label>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                           placeholder="example@cliquestudios.com">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="exampleInputPassword1" class="col-lg-3 col-form-label form-label">Update Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                
                </div>
            </section>
        </div>
    </div>
</template>

<script type="application/javascript">
    import Sidebar from "../Partials/Sidebar.vue";
    export default {
        components: {
            Sidebar
        },
        name: "Profile"
    };
</script>

<style scoped>

</style>
