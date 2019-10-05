<template>
  <div :id="id" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col" v-for="activity in activites" :key="activity.name"
                >{{ activity.name }}</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td v-for="activity in activites" :key="activity.name">
                  {{ activity.time }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-center" style="margin-top:5px; margin-bottom:5px;">
          <p class="lead">Do spalenia {{ kcal | round(1) }} kcal</p>
          <hr >
          <button type="button" class="btn btn-success" @click="closeModal">Zamknij</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import modalMixin from '../../mixins/modal';
import ActivityTimeCalculator from '../../services/ActivityTimeCalculator';

export default {
  name: "ActivitesModal",
  mixins: [modalMixin],
  props: {
    kcal: {
      type: Number,
      required: true
    }
  },

  beforeMount() {
    this.activites.forEach(activity => activity.time = this.getCalculator(activity).timeString);
  },

  methods: {
    getCalculator(activity){
      return new ActivityTimeCalculator({mealKcal: this.kcal, activityMinuteKcal: activity.kcal});
    }
  },

  computed: {
    activites() {
      return baseState.activities;
    }
  }
};
</script>

