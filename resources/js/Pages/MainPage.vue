<template>
    <div>
        <div class="container mx-auto">
            <div class="flex h-screen">
                <div class="m-auto">
                    <div>
                        <router-link :to="{ name: 'admin' }" class="pt-1">Admin</router-link>
                    </div>
                    <!--                <form >-->
                    <form @submit.prevent="saveJson" class="w-96">
                        <div class="mb-6">
                            <!--                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Json Object</label>-->
                            <textarea
                                id="message"
                                rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Json Object"
                                v-model="form.data"
                                ></textarea>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import useDatas from '@/composables/data.js'
import { reactive } from 'vue'

const form = reactive({
    title: '',
})

const { data, storeData } = useDatas()

const saveJson = async () => {
    await storeData({ ...form })
}
</script>

<style>

</style>
