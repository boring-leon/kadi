export default class SearchService {
    
    constructor({ingredients:ingredients, search:search}){
        this.ingredients = ingredients;
        this.search = search;
    }

    filterIngredientsByAll(){
        return this.filterIngredientsByName().filter(i => this.typeMatches(i));
    }

    filterIngredientsByName(){
        return this.ingredients.filter(i => this.nameMatches(i));
    }

    nameMatches(ingredient){
        return this.matchByFullName(ingredient) || this.matchByFirstLetter(ingredient);   
    }

    typeMatches(ingredient){
        return this.matchByType(ingredient) || this.isSearchWildcard(ingredient);
    }

    matchByFullName(ingredient){
        return this.nameIncludesSearchName(ingredient) && this.search.name.trim().length > 0;
    }

    matchByFirstLetter(ingredient){
        return this.nameFirstLetterMatchesSearchName(ingredient) && this.search.name.trim().length == 1;
    }

    matchByType(ingredient) {
        return this.getStringForComparison(this.search.type) == this.getStringForComparison(ingredient.type);
    }

    isSearchWildcard(){
        return this.search.type == '*';
    }

    nameIncludesSearchName(ingredient) {
        return this.getStringForComparison(ingredient.name)
        .includes(this.getStringForComparison(this.search.name));
    }

    nameFirstLetterMatchesSearchName(ingredient) {
        const firstNameLetter = this.getStringForComparison(ingredient.name.trim().charAt(0));
        const firstSearchLetter = this.getStringForComparison(this.search.name.trim().charAt(0));
        return this.getStringForComparison(firstNameLetter) == this.getStringForComparison(firstSearchLetter);
    }

    getStringForComparison(s){
        return s.toUpperCase().trim();
    }
}