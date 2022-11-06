import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useDatas() {
    const datas = ref([])
    const data = ref([])

    const errors = ref('')
    const router = useRouter()

    const getDatas = async () => {
        let response = await axios.get('/api/datas')
        datas.value = response.data.data
    }

    const getData = async (id) => {
        let response = await axios.get(`/api/datas/${id}`)
        data.value = response.data.data
    }


    const storeData = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/datas', data)
            await router.push({ name: 'index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const updateData = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/datas/${id}`, data.value)
            await router.push({ name: 'admin' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    return {
        errors,
        datas,
        data,
        getDatas,
        updateData,
        getData,
        storeData,
    }
}
