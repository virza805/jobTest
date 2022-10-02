const staffs = {

    namespaced: true,

    state() {
        return {
            roles: ["Admin", "Staff", "Other"],
            staffs: JSON.parse(localStorage.getItem("staffs:staffs")) || [],
            filterRole: "",
        };
    },
    getters: {
        allCount(state) {
            return state.staffs.length;
        },
        staffCountByRole(state) {
            return state.roles.map((role) => {
                return {
                    role,
                    staffCount: state.staffs.filter((staff) => staff.role === role).length,
                };
            });
        },

        filteredStaffs(state) {
            if (state.filterRole == "") {
                return state.staffs;
            }
            return state.staffs.filter((staff) => staff.role === state.filterRole);
        },
    },
    mutations: {
        addStaff(state, staff) {
            state.staffs.unshift(staff);
        },
        filterStaff(state, role) {
            state.filterRole = role;
        },
        deleteStaff(state, id) {
            state.staffs = state.staffs.filter((staff) => staff.id !== id);
        },
    },

}
export default staffs;