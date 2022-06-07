<template>
  <div>
    <div class="d-md-flex justify-content-between mb-3">
      <h3 class="text-header">User Management</h3>
    </div>
    <div class="card rounded h-100 background-white">
      <div class="d-flex flex-column card-body w-100">
        <div>
          <table class="table table-borderless table-responsive d-md-table">
            <thead style="border-bottom: 1px solid #c4c4c4;">
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(user) in users" :key="user.id">
                <td class="align-middle">{{ user.name }}</td>
                <td class="align-middle">{{ user.email }}</td>
                <td class="align-middle">
                    <b v-if="user.is_admin">
                      Admin
                    </b>
                    <b v-else>
                      Member
                    </b>
                </td>
                <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-user-modal" 
                    @click="editUser(user)">
                    <span class="mdi mdi-pencil"></span>
                  </button>
                </td>
              </tr>
            </tbody> 
          </table>    
        </div>
      </div>
    </div>
    <DashboardUserFormEdit :selectedUser="selectedUser"></DashboardUserFormEdit>
  </div>
</template>

<script>
export default {
  props: {
    users: {
      type: Array,
      default: null
    },
  },
  data() {
    return {
      selectedUser : {},
    }
  },
  methods: {
    editUser(item) {
      this.selectedUser = item;
    },
  },
};
</script>

<style>

</style>
