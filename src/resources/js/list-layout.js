window.handleSelect = (event) => {
    console.log(event);
    location.href = `http://localhost:8080/list/${event.target.value}`;
};
