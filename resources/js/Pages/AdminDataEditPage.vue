<template>
    <div>
        <div class="container mx-auto">
            <div class="flex h-screen">
                <div class="m-auto">
                    <!--                <form >-->
                    <form @submit.prevent="saveJson" class="w-96">
                        <div class="mb-6">
                            <!--                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Json Object</label>-->
                            <textarea
                                id="message"
                                rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                v-model="this.data" placeholder=""
                            ></textarea>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            data: {},

        };
    },
    created() {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('access_token')
        axios.get(`/api/datas/${this.$route.params.id}`)
            .then((res) => {
                this.data = res.data.data;
                console.log(this.data.object)
            });
    },
    methods: {
        saveJson() {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('access_token')
            axios
                .patch(`/api/datas/${this.$route.params.id}`, this.data)
                .then((res) => {
                    this.$router.push({ name: 'admin' });
                }).catch(
                e => {
                    // this.errors = e.data.errors;
                    this.errors = e.response.data.errors;
                    console.log(e.response.data.errors)
                }
            );
        },
    }
}
</script>

<style scoped>

</style>
