<template>
    <login />
</template>
<script>
import { useAuthStore } from '@/stores/auth'
import { mapWritableState } from 'pinia'
import login from '@/components/loginadmin.vue'
export default {
    components: {
        login
    },
}
</script>
<style scoped></style>