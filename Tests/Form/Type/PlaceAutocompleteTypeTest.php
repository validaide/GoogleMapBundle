<?php


namespace Ivory\GoogleMapBundle\Tests\Form\Type;

use PHPUnit\Framework\MockObject\MockObject;
use Ivory\GoogleMap\Base\Bound;
use Ivory\GoogleMap\Place\Autocomplete;
use Ivory\GoogleMap\Place\AutocompleteComponentType;
use Ivory\GoogleMap\Place\AutocompleteType;
use Ivory\GoogleMapBundle\Form\Type\PlaceAutocompleteType;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Forms;

class PlaceAutocompleteTypeTest extends TestCase
{
    private FormFactoryInterface $factory;

    protected function setUp(): void
    {
        $this->factory = Forms::createFormFactoryBuilder()
            ->addType(new PlaceAutocompleteType())
            ->getFormFactory();
    }

    public function testDefault()
    {
        $form = $this->createForm();
        $view = $form->createView();

        $this->assertArrayHasKey('autocomplete', $view->vars);
        $this->assertInstanceOf(Autocomplete::class, $autocomplete = $view->vars['autocomplete']);
        $this->assertStringStartsWith('autocomplete', $autocomplete->getVariable());
        $this->assertSame('place_autocomplete', $autocomplete->getHtmlId());
        $this->assertFalse($autocomplete->hasBound());
        $this->assertFalse($autocomplete->hasValue());
        $this->assertSame(['name' => 'place_autocomplete'], $autocomplete->getInputAttributes());
    }

    public function testVariable()
    {
        $form = $this->createForm(null, ['variable' => $variable = 'foo']);
        $view = $form->createView();

        $this->assertArrayHasKey('autocomplete', $view->vars);
        $this->assertInstanceOf(Autocomplete::class, $autocomplete = $view->vars['autocomplete']);
        $this->assertSame($variable, $autocomplete->getVariable());
    }

    public function testBound()
    {
        $form = $this->createForm(null, ['bound' => $bound = $this->createBoundMock()]);
        $view = $form->createView();

        $this->assertArrayHasKey('autocomplete', $view->vars);
        $this->assertInstanceOf(Autocomplete::class, $autocomplete = $view->vars['autocomplete']);
        $this->assertSame($bound, $autocomplete->getBound());
    }

    public function testTypes()
    {
        $form = $this->createForm(null, ['types' => $types = [AutocompleteType::CITIES]]);
        $view = $form->createView();

        $this->assertArrayHasKey('autocomplete', $view->vars);
        $this->assertInstanceOf(Autocomplete::class, $autocomplete = $view->vars['autocomplete']);
        $this->assertSame($types, $autocomplete->getTypes());
    }

    public function testComponents()
    {
        $form = $this->createForm(null, ['components' => $components = [AutocompleteComponentType::COUNTRY => 'fr']]);
        $view = $form->createView();

        $this->assertArrayHasKey('autocomplete', $view->vars);
        $this->assertInstanceOf(Autocomplete::class, $autocomplete = $view->vars['autocomplete']);
        $this->assertSame($components, $autocomplete->getComponents());
    }

    public function testLibraries()
    {
        $form = $this->createForm(null, ['libraries' => $libraries = ['drawing']]);
        $view = $form->createView();

        $this->assertArrayHasKey('autocomplete', $view->vars);
        $this->assertInstanceOf(Autocomplete::class, $autocomplete = $view->vars['autocomplete']);
        $this->assertSame($libraries, $autocomplete->getLibraries());
    }

    public function testInitialValue()
    {
        $form = $this->createForm($value = 'foo');
        $view = $form->createView();

        $this->assertArrayHasKey('autocomplete', $view->vars);
        $this->assertInstanceOf(Autocomplete::class, $autocomplete = $view->vars['autocomplete']);
        $this->assertSame($value, $autocomplete->getValue());
    }

    public function testSubmit()
    {
        $form = $this->createForm()->submit($value = 'foo');
        $view = $form->createView();

        $this->assertArrayHasKey('autocomplete', $view->vars);
        $this->assertInstanceOf(Autocomplete::class, $autocomplete = $view->vars['autocomplete']);
        $this->assertSame($value, $autocomplete->getValue());
    }

    /**
     * @param mixed[] $options
     * @return FormInterface
     */
    private function createForm($data = null, array $options = []): FormInterface
    {
        return $this->factory->create(
            method_exists(AbstractType::class, 'getBlockPrefix') ? PlaceAutocompleteType::class : 'place_autocomplete',
            $data,
            $options
        );
    }

    private function createBoundMock(): MockObject|Bound
    {
        return $this->createMock(Bound::class);
    }
}
