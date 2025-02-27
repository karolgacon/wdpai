<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="/data/css/pure.css">
</head>
<body>
<?php include __DIR__ . '/../partials/sidebar.php'; ?>
<?php include __DIR__ . '/../partials/topnavbar.php'; ?>
<div class="content">
    <h1 class="mb-4 text-center">Add Service</h1>
    <form action="/service_add" method="POST">
        <div class="mb-3">
            <label for="vehicle_id" class="form-label">Vehicle</label>
            <select id="vehicle_id" name="vehicle_id" class="form-select" required>
                <option value="">Select Vehicle</option>
                <?php foreach ($vehicles as $vehicle): ?>
                    <option value="<?php echo $vehicle->getId(); ?>">
                        <?php echo htmlspecialchars($vehicle->getMake() . ' ' . $vehicle->getModel()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" id="description" name="description" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Proposed Date</label>
            <input type="datetime-local" id="date" name="date" class="form-control"
                   value="<?php echo date('Y-m-d\TH:i'); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Request Service</button>
        <a href="/services" class="btn btn-secondary w-100">Cancel</a>
    </form>
</div>
<script src="/data/js/services.js"></script>
<script src="/data/js/pure.js"></script>
</body>
</html>
