<template>
    <div>
        <div class="container mx-auto">
            <div>
                <div v-for="data in datas" :key="data.id">
                    <div class="flex pt-8">
                        <div class="pr-4">{{data.id}}.</div>
                        <div class="pr-4">{{data.data}}</div>

                        <router-link :to="{ name: 'dataEdit', params: { id: data.id } }"
                                     class="font-medium text-blue-600 dark:text-blue-500 hover:text-blue-600 hover:underline">Edit
                        </router-link>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import useDatas from '@/composables/data.js'
import { onMounted  } from 'vue'


const { datas, getDatas } = useDatas()

onMounted(getDatas)
</script>

<style scoped>

</style>
