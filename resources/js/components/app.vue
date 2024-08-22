<template>
    <div>
        <h1>{{ message }}</h1>
        <input type="text" v-model="search"/>
        <table>
            <th>
                <td>National Dex Number</td>
                <td>Pokemon</td>
                <td></td>
            </th>
            <tr v-for="pokemon in filtereddex" :key="pokemon.entry_number" @click="selectPokemon(pokemon)">
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
                fulldex: [],
                filtereddex: [],
                selectedPokemon: {},
            }
        },
        mounted() {
            axios.get('https://pokeapi.co/api/v2/pokedex/1')
                .then(response => {
                    this.fulldex = response.data.pokemon_entries
                    this.filtereddex = this.fulldex
                    console.log(this.fulldex)
                })
        },
        methods: {
            filterPokemon() {
                console.log(this.search);
                this.filtereddex = this.fulldex.filter(pokemon => {
                    return pokemon.pokemon_species.name.includes(this.search.toLowerCase())
                })
            },
            selectPokemon(pokemon) {
                console.log(pokemon)
                window.location.href = '/pokemon/' + pokemon.entry_number
            }
        },
        watch: {
            search: function (val) {
                console.log(val)
                if (val.length > 2) {
                    this.filterPokemon()
                }
                else {
                    this.filtereddex = this.fulldex
                }
            }
        }
    }
</script>
<style scoped>
    tr{
        cursor: pointer;
    }
</style>