const columns = [
    {
        title: "Name",
        dataIndex: "name"
    },
    {
        title: "Path",
        dataIndex: "path",
        width: "15%"
    },
    {
        title: "Icon",
        key: "icon",
        className: "column-center",
        width: "10%",
        scopedSlots: { customRender: "icon" }
    },
    {
        title: "Created At",
        key: "created_at",
        className: "column-center",
        dataIndex: "created_at",
        width: "15%"
    },
    {
        title: "Updated At",
        key: "updated_at",
        className: "column-center",
        dataIndex: "updated_at",
        width: "15%"
    },
    {
        title: "Action",
        key: "action",
        className: "column-center",
        width: "15%",
        scopedSlots: { customRender: "action" }
    }
];

export default columns;
