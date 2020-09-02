const state = {
    allLinks : {
        exploreActive : true,
        challengeActive : false,
        overviewActive : false,
        historyActive : false
    }
}

const getters = {
    allLinks: (state) => state.allLinks
}

const actions = {
    
}

const mutations = {
    updateLinks(state, activeLink){
        if (activeLink == "exploreActive"){
            state.allLinks.exploreActive = true
            state.allLinks.challengeActive = false
            state.allLinks.overviewActive = false
            state.allLinks.historyActive = false
        }
        else if (activeLink == "challengeActive"){
            state.allLinks.exploreActive = false
            state.allLinks.challengeActive = true
            state.allLinks.overviewActive = false
            state.allLinks.historyActive = false
        }
        else if(activeLink == "overviewActive"){
            state.allLinks.exploreActive = false
            state.allLinks.challengeActive = false
            state.allLinks.overviewActive = true
            state.allLinks.historyActive = false
        }
        else if (activeLink == "historyActive"){
            state.allLinks.exploreActive = false
            state.allLinks.challengeActive = false
            state.allLinks.overviewActive = false
            state.allLinks.historyActive = true
        }
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}