<?php
namespace App\Service;

use Amenadiel\JpGraph\Graph\Graph;
use Amenadiel\JpGraph\Graph\PieGraph;
use Amenadiel\JpGraph\Plot\LinePlot;
use Amenadiel\JpGraph\Plot\BarPlot;
use Amenadiel\JpGraph\Plot\PiePlot;

class GraphGenerator
{
    public function generate(String $type, Array $data, Array $labels)
    {
        switch ($type) {
            case 'diagramHistogram':
                return $this->generateBarPlot($type, $data, $labels);
            case 'diagramLineChart':
                return $this->generateLinePlot($type, $data, $labels);
            case 'diagramPieChart':
                return $this->generatePiePlot($type, $data, $labels);
            default:
                throw new \Exception('Undefined graph type');
        }
    }

    private function generateLinePlot(String $type, Array $data, Array $labels)
    {
        $graph = new Graph(400, 300, 'auto', 10, true);
        $graph->SetScale('textlin');
        $graph->xaxis->SetTickLabels($labels);
        $lineplot = new LinePlot($data);
        $lineplot->SetColor('forestgreen');
        $lineplot->SetCenter();
        $graph->Add($lineplot);
        $graph->title->Set('Значения коэффициента');
        $graph->title->SetFont(FF_VERDANA, FS_NORMAL);
        $graph->xaxis->title->SetFont(FF_VERDANA, FS_ITALIC);
        $graph->yaxis->title->SetFont(FF_VERDANA, FS_ITALIC);
        $graph->xaxis->title->Set('Временные промежутки');
        $graph->yaxis->title->Set(' ');
        $lineplot->value->Show();
        return $this->convertToBase64($graph);
    }

    private function generateBarPlot(String $type, Array $data, Array $labels)
    {
        $width = 400;
        $height = 500;

        // Set the basic parameters of the graph
        $graph = new Graph($width, $height);
        $graph->SetScale('textlin');

        // Setup labels
        $graph->xaxis->SetTickLabels($labels);

        // Titles
        $graph->title->Set('Значения коэффициента');

        // Create a bar pot
        $bplot = new BarPlot($data);
        $bplot->SetFillColor('orange');
        $bplot->SetWidth(0.5);
        $bplot->value->Show();

        $graph->Add($bplot);

        return $this->convertToBase64($graph);
    }

    private function generatePiePlot(string $type, array $data, array $labels)
    {
        foreach ($labels as &$value) {
            $value = $value . '(%.1f%%)';
        }

        unset($value);

        // Create the Pie Graph.
        $graph = new PieGraph(400,300);
        $graph->SetShadow();

        // Set A title for the plot
        $graph->title->Set('Значения коэффициента');
        $graph->title->SetFont(FF_VERDANA,FS_BOLD,12);
        $graph->title->SetColor('black');

        // Create pie plot
        $p1 = new PiePlot($data);
        $p1->SetCenter(0.5,0.5);
        $p1->SetSize(0.3);

        // Setup the labels to be displayed
        $p1->SetLabels($labels);

        // This method adjust the position of the labels. This is given as fractions
        // of the radius of the Pie. A value < 1 will put the center of the label
        // inside the Pie and a value >= 1 will pout the center of the label outside the
        // Pie. By default the label is positioned at 0.5, in the middle of each slice.
        $p1->SetLabelPos(1);

        // Setup the label formats and what value we want to be shown (The absolute)
        // or the percentage.
        $p1->SetLabelType(PIE_VALUE_PER);
        $p1->value->Show();
        $p1->value->SetFont(FF_ARIAL,FS_NORMAL,9);
        $p1->value->SetColor('darkgray');

        // Add and stroke
        $graph->Add($p1);
        return $this->convertToBase64($graph);
    }

    private function convertToBase64(Graph $graph)
    {
        $graph->Stroke(_IMG_HANDLER);
        ob_start();
        $graph->img->Stream();
        $image_data = ob_get_contents();
        ob_end_clean();
        return base64_encode($image_data);
    }
}
