<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="/data/css/pure.css">
</head>
<body>
<?php include __DIR__ . '/../partials/sidebar.php'; ?>
<?php include __DIR__ . '/../partials/topnavbar.php'; ?>
<div class="content">
    <div class="container mt-4">
    <h1 class="mb-4 text-center">Services</h1>
    <a href="/service_add" class="btn btn-primary mb-3">Add Service</a>
        <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Vehicle</th>
            <th>Description</th>
            <th>Date</th>
            <th>Cost</th>
            <th>Total Cost</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($services as $service): ?>
            <tr>
                <td><?php echo htmlspecialchars($service['id']); ?></td>
                <td>
                    <?php echo isset($service['make'], $service['model'])
                        ? htmlspecialchars($service['make'] . ' ' . $service['model'])
                        : 'Unknown Vehicle'; ?>
                </td>
                <td><?php echo htmlspecialchars($service['description']); ?></td>
                <td><?php echo htmlspecialchars(date('Y-m-d H:i', strtotime($service['date']))); ?></td>
                <td><?php echo isset($service['cost']) ? number_format($service['cost'], 2) . ' USD' : 'N/A'; ?></td>
                <td><?php echo isset($service['total_cost']) ? number_format($service['total_cost'], 2) . ' USD' : 'N/A'; ?></td>
                <td><?php echo htmlspecialchars(ucfirst($service['status'])); ?></td>
                <td>
                    <?php if ($_SESSION['user_role'] === 'admin'): ?>
                        <a href="/service_edit?id=<?php echo $service['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/service_delete?id=<?php echo $service['id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">Delete</a>
                    <?php if ($service['status'] === 'pending'): ?>
                        <a href="/service_accept?id=<?php echo $service['id']; ?>" class="btn btn-success btn-sm">Accept</a>
                    <?php elseif ($service['status'] !== 'completed'): ?>
                        <a href="/service_mark_completed?id=<?php echo $service['id']; ?>" class="btn btn-success btn-sm">Mark as Completed</a>
                    <?php endif; ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php if (!empty($service['parts'])): ?>
                <tr>
                    <td colspan="8">
                        <strong>Parts Used:</strong>
                        <ul>
                            <?php foreach ($service['parts'] as $part): ?>
                                <li class="ml-4">
                                    <?php echo htmlspecialchars($part['part_name']); ?> -
                                    Quantity: <?php echo htmlspecialchars($part['quantity']); ?> -
                                    Cost: <?php echo number_format($part['total_cost'], 2); ?> USD
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>

    </table>

</div>
</div>
</div>
<footer class="footer mt-auto py-3 bg-dark text-light text-center">
    <div class="container">
        <span>© 2025 Garage Master. All Rights Reserved.</span>
    </div>
</footer>
<script src="/data/js/pure.js"></script></body>
</html>
