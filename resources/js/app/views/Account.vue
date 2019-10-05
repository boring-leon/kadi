<template>
  <article class="text-center">
    <HeaderCenter>Zarządzanie kontem</HeaderCenter>
    <hr />
    <p class="lead">
      <b>Uwaga, usunięcie konta jest nieodwracalne!</b>
      <br />Wraz z nim zostaną usunięte wszystkie Twoje składniki i posiłki.
    </p>
    <footer class="btn-block-container absolute-bottom">
      <p>Naciśnij dwukrotnie, aby usunąć swoje konto</p>
      <button class="btn btn-danger btn-lg" @dblclick="deleteAccount">Usuń konto</button>
    </footer>
  </article>
</template>

<script>
import AccountModel from "../api/models/Account";
export default {
  name: "AccountView",
  methods: {
    deleteAccount() {
      AccountModel.deleteAccount();
      window.location.replace('/logout');
    }
  }
};
</script>