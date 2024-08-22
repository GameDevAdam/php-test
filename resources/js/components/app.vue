<template>
    <div>
        <h1>{{ message }}</h1>
        <input type="text" v-bind="search"/>
        <table>
            <th>
                <td>National Dex Number</td>
                <td>Pokemon</td>
            </th>
            <tr v-for="pokemon in dex" :key="pokemon.entry_number">
                <td>{{  pokemon.entry_number}}</td>
                <td>{{ pokemon.pokemon_species.name.toUpperCase() }}</td>
            </tr>
        </table>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                message: 'Pokedex Helper Page',
                search: '',
                dex: []
            }
        },
        mounted() {
            axios.get('https://pokeapi.co/api/v2/pokedex/1')
                .then(response => {
                    this.dex = response.data.pokemon_entries
                    console.log(this.dex)
                })
        }
    }
</script>