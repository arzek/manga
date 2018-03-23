<template>
    
</template>

<script>
	export default {
		name: "new-component",
        mounted() {
            axios.get('/test').then( (response) => {
                console.log(response.data);

            });
        }
	}
</script>

<style scoped>

</style>