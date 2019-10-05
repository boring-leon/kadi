import DynamicStepView from '../views/DynamicStepView.vue';
import IngredientView from '../views/UserIngredients.vue';
import PlatesView from '../views/UserPlates.vue';
import SupportView from '../views/Support.vue';
import TutorialView from '../views/Tutorial.vue';
import AccountView from '../views/Account.vue';

export default [
    { 
        path: '/wybierz-skladniki', component: DynamicStepView, name: "StepOne", meta:{
            title: 'Krok 1'
        },
        props: (route) => ({ activeComponent:"StepOne", step:0 })
    }, 
    {
        path: '/wybierz-ilosc', component: DynamicStepView, name: "StepTwo", meta:{
            title: 'Krok 2'
        },
        props: (route) => ({ activeComponent:"StepTwo", step:1 })
    },
    {
        path: '/potwierdz-posilek', component: DynamicStepView, name: "StepThree", meta: {
            title: 'Podsumowanie'
        },
        props: (route) => ({ activeComponent:"StepThree", step:2 })
    },
    {
        path: '/moje-skladniki', component: IngredientView, name: "UserIngredients", meta:{
            title: `Moje składniki`
        }
    },
    {
        path: '/moje-posilki', component: PlatesView, name: "UserPlates", meta:{
            title: 'Moje posiłki'
        }
    },
    {
        path: '/moje-konto', component: AccountView, name: "UserAccount", meta:{
            title: `${baseState.user.name} - konto w Kadi`
        }
    },
    {
        path: '/wsparcie', component: SupportView, name: "support", meta: {
            title: 'Wsparcie'
        }
    },
    {
        path: '/jak-korzystac', component: TutorialView, name: "tutorial", meta: {
            title: "Jak korzystać z aplikacji?"
        }
    },
    {
        path: '*', redirect: '/wybierz-skladniki'
    }
]