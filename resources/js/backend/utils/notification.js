export default (self, type, message) => {
    self.$notification[type]({
        message: "Information",
        description: message,
        style: {
            marginLeft: `10%`,
            marginTop: `10%`
        }
    });
};
