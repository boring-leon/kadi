export default {
    methods: {
        nameMatches(ingredient) {
            const includesName = this.includesName(ingredient);
            const firstLetter = this.hasSameFirstLetter(ingredient);
            if (includesName && this.search.name.trim().length > 1) {
              return true;
            } 
            else if (firstLetter && this.search.name.trim().length == 1) {
              return true;
            }
      
            return false;
          },
      
          includesName(ingredient) {
            return ingredient.name.toUpperCase().includes(this.search.name.toUpperCase());
          },
      
          hasSameFirstLetter(ingredient) {
            return (
              this.search.name.toUpperCase().trim().charAt(0) == ingredient.name.toUpperCase().trim().charAt(0)
            );
          },
      
          typeMatches(ingredient) {
            return (
              this.search.type.toUpperCase().trim() == ingredient.type.toUpperCase().trim() || this.search.type == "*"
            );
          },
      
          hasNotBeenSelected(ingredient) {
            return !this.$store.getters["Plate/find"](ingredient.templateKey);
          },
    },
}