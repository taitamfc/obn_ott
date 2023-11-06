module.exports = (req, res) => {
    const userId = req.body.id;

    if (userId === 1) {
        return res.status(209).json({
            errorMessage: "UserId already exists"
        });
    }
    
    return res.status(201).json({
        id: req.body.id,
        userName: req.body.userName,
        age: req.body.age
    });
}