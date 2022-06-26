<template>
    <div>
        <h2>Sono il MainComponent</h2>
        <h3>{{titolo}}</h3>
    </div>
</template>

<script>
export default {
    name: 'MainComponent',
    data(){
        return {
            'titolo': 'Sono il titolo del main component'
        }
    }
}
</script>

<style lang="scss">

</style>