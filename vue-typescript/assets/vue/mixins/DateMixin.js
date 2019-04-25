export const DateMixin = {
  methods: {
    getMonthName(month) {
      const months = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
      ];

      return months[month];
    },
    getFormattedDate(timestamp) {
      const date = new Date(timestamp);
      const dateString =
        this.getMonthName(date.getMonth()) +
        ' ' +
        date.getDate() +
        ', ' +
        date.getFullYear();

      return dateString;
    },
  },
};
