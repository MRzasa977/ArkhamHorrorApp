<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Game
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <game-selection />
                    <div>
                        <character-selection v-on:click="getCharacters" :characters="characters" :game="currentGame" 
                        v-on:playercreated="getPlayers($event)" />
                    </div>

                    <player-inputs :game="currentGame" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
import GameSelection from './GameSelection.vue'
import CharacterSelection from './CharacterSelection.vue'
import PlayerInputs from './PlayerInputs.vue'


    export default {
        components: {
            AppLayout,
                GameSelection,
                CharacterSelection,
                PlayerInputs,
        },
        data: function() {
            return {
                chatRooms: [],
                currentGame: [],
                characters: [],
                currentPlayers: [],
                myPlayer: [],
            }
        },
        methods: {
            getGames() {
                axios.get('/chat/gamerooms')
                .then(response => {
                    this.gameRooms = response.data;
                    this.setGame( response.data[0] );
                })
                .catch( error => {
                    console.log( error );
                })
            },
            setGame (game) {
                this.currentGame = game;
                
            },
            getFirstPlayer() {
                axios.get()
            },
            getCharacters(){
                characters = axios.get('chat/gamerooms/' + this.currentGame.id + '/characters')
                .then( response => {
                    this.characters = response.data;
                })
                .catch( error => {
                    console.log( error );
                });
            },
            getPlayers(newPlayer) {
                this.myPlayer = newPlayer;
                console.log(this.myPlayer);
                axios.get('chat/gamerooms/' + this.currentGame.id + '/players')
                .then( response => {
                    this.currentPlayers = response.data;
                })
                .catch( error => {
                    console.log( error );
                });
            },
        },
        created() {
            this.getGames();
        }
    }
</script>


                